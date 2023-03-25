<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'title' => $this->title,
            'author' => $this->author,
            'isbn' => $this->isbn,
            'date_pub' => $this->date_pub,
            'num_pages' => $this->num_pages,
            'collection' => $this->collection,
            'location' => $this->status,
            'user' => $this->user->name,
            'gender' => $this->gender->name
        ];
    }
}
