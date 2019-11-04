<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($question){
                return [
                       'id' => $question->id,
                       'name' => $question->name,
                       'type'  => $question->type,
                       'question_require' => $question->question_require,
                        'date'         => $question->date
                ];
            })
        ];
    }
}
