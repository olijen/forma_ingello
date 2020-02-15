<?php

namespace forma\modules\core\services;

use Yii;

class ExportService
{
    public static function formatContent($content, $type)
    {
        foreach (self::getMethodsListByType($type) as $methodName) {
            $content = self::$methodName($content);
        }
        return $content;
    }

    protected static function getMethodsLists()
    {
        return [
            [['pdf', 'xls', 'html'], 'formatTh', 'formatTd'],
            [['csv', 'txt']],
            [['json', 'csv'], 'removeEmptyValues'],
            [['html'], 'setStyle'],
        ];
    }

    protected static function formatTd($content)
    {
        return self::formatElement($content, 'td', 'removeEmptyTdContent');
    }

    protected static function formatTh($content)
    {
        return self::formatElement($content, 'th', 'replaceShortLabels');
    }

    protected static function getMethodsListByType($type)
    {
        $typeList = [];

        foreach (self::getMethodsLists() as $list) {
            if (is_string($list[0]) && $list[0] == '*'
                || is_string($list[0]) && $list[0] == $type
                || is_array($list[0]) && in_array('*', $list[0])
                || is_array($list[0]) && in_array($type, $list[0])) {

                array_splice($list, 0, 1);
                $typeList = array_merge($typeList, $list);
            }
        }

        return $typeList;
    }

    protected static function formatElement($html, $tagName, $callback)
    {
        $formatted = $html;

        $offset = 0;
        while(($elemBeginning = mb_strpos($html, "<$tagName", $offset)) !== false) {
            $elemEnd = mb_strpos($html, "</$tagName>", $offset) + mb_strlen("</$tagName>");
            $offset = $elemEnd;
            $elem = mb_substr($html, $elemBeginning, $elemEnd - $elemBeginning);
            $formatted = str_replace($elem, self::runCallback($callback, $elem), $formatted);
        }

        return $formatted;
    }

    protected static function runCallback($callback, $elem)
    {
        $methodName = '';
        $options = [];
        if (is_string($callback)) {
            $methodName .= $callback;
        } elseif (is_array($callback)) {
            $methodName .= $callback[0];
            array_splice($callback, 0, 1);
            $options = $callback;
        }
        if (empty($options)) {
            return self::$methodName($elem);
        }
        return self::$methodName($elem, $options);
    }

    protected static function replaceShortLabels($th)
    {
        $regex = '/(<th[^>]*?>).*?<span[^>]*?data-original-label=["\'](.*?)["\'][^>]*?>.*?<\/span>.*?(<\/th>)/';
        return preg_replace($regex, '$1$2$3', $th);
    }

    protected static function removeEmptyTdContent($td)
    {
        $regex = '/(<td[^>]*?>)(.*?)(<\/td>)/';
        preg_match($regex, $td, $matches);

        $openingTag = $matches[1];
        $content = $matches[2];
        $endTag = $matches[3];

        $content = preg_replace(self::getTdNullDisplayRegex(), '', $content);
        $content = trim($content) == '/' ? '' : $content;

        return $openingTag . $content . $endTag;
    }

    protected static function removeEmptyValues($content)
    {
        return str_replace(self::getNullDisplay(), '', $content);
    }

    protected static function getTdNullDisplayRegex()
    {
        $notSet = self::getNullDisplay();
        $notSet = str_replace('(', '\(', $notSet);
        $notSet = str_replace(')', '\)', $notSet);

        return '/<span class=["\']not-set["\']>' . $notSet . '<\/span>/';
    }

    protected static function getNullDisplay()
    {
        return Yii::t('yii', '(not set)', [], Yii::$app->language);
    }

    protected static function setStyle($content)
    {
        $content = self::formatElement($content, 'th', 'setCellStyle');
        return self::formatElement($content, 'td', 'setCellStyle');
    }

    protected static function setCellStyle($cellElem)
    {
        $regex = '/(<t[hd]) ?([^>]*?>)/';
        $style = 'border: 1px #ccc solid; padding: 1em;';
        return preg_replace($regex, '$1 style="' . $style . '"$2', $cellElem);
    }
}
