<?php

namespace forma\modules\selling\services;

/**
 * Class FreelancehuntService
 * @package forma\modules\selling\services
 *
 * {
 * ["id"]=> int(659473)
 * ["type"]=> string(7) "project"
 * ["attributes"]=> array(19)
 * {
 * ["name"]=> string(52) "Видео ролики для ютуб канала"
 * ["description"]=> string(382) "активных ссылок на вебсайты в видео. "
 * ["description_html"]=> string(393) "Ищем человека для создания коротких вид"
 *
 * ["skills"]=> array(2)
 * {
 * [0]=> array(2)
 * {
 * ["id"]=> int(113)
 * ["name"]=> string(34) "Аудио/видео монтаж"
 * }
 */

class FreelancehuntService
{
    public static $api_token = 'olijen'; // ваш идентификатор
    public static $api_secret = 'a80ee1fc7d242f9000be6f898e67d826fa3ff153'; // ваш секретный ключ

    public static function getPotentialProjects()
    {
        $page = 1;
        $totalResult = [];
        while (true) {
            //Ждать 1\10 секунды, т.е. парсим 10 раз в секунду
            usleep(100000);
            $result = self::getProjects($page);
            if ($result === false
            || (!isset($_GET['all']) && $page > 5)
            ) {
                break;
            }
            $page++;
            $totalResult = array_merge($totalResult, $result);
        }
        return $totalResult;
    }

    public static function getProjects($page = 0)
    {
        $page = '?page[number]='.$page;
        $projects = self::request('projects'.$page);

        if (!$projects || empty ($projects['data'])) {
            return false;
        }

        foreach ($projects['data'] as &$project) {
            $project['statuses'] = self::getProjectStatuses($project);
            $project['status_color'] = self::getProjectColor($project);
        }


        return $projects['data'];
    }

    public static function request($url, $data = [])
    {
        $url = 'https://api.freelancehunt.com/v2/' . $url;
        $params = $data != [] ? json_encode($data) : '';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLINFO_HEADER_OUT, true); // enable tracking
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_HEADER, 1);

        $request = [];
        if ($data != []) {
            $request = [
                //CURLOPT_HEADER       => 1, // позволяет просмотреть заголовки ответа сервера при необходимости отладки
                CURLOPT_RETURNTRANSFER => 1,
                //CURLOPT_USERPWD        => self::$api_token . ":" . $signature,
                CURLOPT_URL            => $url,
                //
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => $params,
            ];
        } else {
            $request = [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "Authorization: Bearer ".self::$api_secret
                ],
            ];
        }

        curl_setopt_array($curl, $request);
        $return = curl_exec($curl);

        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $responseHeaders = substr($return, 0, $header_size);
        $responseHeaders = ['headers' => explode ("\n", $responseHeaders)];

        $return = substr($return, $header_size);
        $responseHeaders['status'] = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);
        return array_merge($responseHeaders, json_decode($return, true));
    }

    private static function getProjectStatuses($project)
    {
        $statuses = [
            'minus-word',
            'micro-budget',
            'micro-budgets',
        ];

        $result = [];

        return $result;
    }

    private static function getProjectColor($project)
    {
        $color = '#cccccc';

        return $color;
    }
}
