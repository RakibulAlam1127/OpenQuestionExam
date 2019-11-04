<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionAnswerCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'data' => $this->collection->transform(function($answer){
                return [
                    'id' => $answer->id,
                    'type' => $answer->question->type,
                    'name' => $answer->question->name,
                    'question'   => $answer->question->question_require,
                    'answer' => $answer->answer,
                    'date'   => $answer->question->date,
                    'description' => $answer->description,
                    'email'  => $answer->user_name

                ];
            })
        ];
    }
}
