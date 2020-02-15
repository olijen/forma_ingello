<?php

namespace forma\modules\hr\services;


use forma\modules\hr\records\talk\Answer;


class AnswerService
{
    /**
     * @return object Answer
     */
    public static function getAnswer()
    {
        return new Answer();
    }

    /**
     * @param $request
     * @return int count Request::getAnswer()\0
     */
    public static function getCountAnswer($request)
    {
        if (!empty($request)) {
            return count($request->getAnswers()->all());
        }

        return 0;
    }


}