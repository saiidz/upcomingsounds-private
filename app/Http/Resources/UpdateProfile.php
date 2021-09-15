<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UpdateProfile extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user'     => isset($this['user']) ? $this['user'] : null,
            'document' => !empty($this['user']->userDocuments()) ? $this['user']->userDocuments()->select('id', 'path', 'type')->where('type','document')->get()->map(function($col) { $col->path = config('app.url').'/uploads/user_document/'.$col->path; return $col; }) : null,
            'profile'  => !empty($this['user']->userDocuments()) ? $this['user']->userDocuments()->select('id', 'path', 'type')->where('type','profile')->get()->map(function($col) { $col->path = config('app.url').'/uploads/user_profile/'.$col->path; return $col; }) : null,
        ];
    }
}
