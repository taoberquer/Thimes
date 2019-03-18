<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

  protected $hidden = [
     'id', 'flux_id','title', 'description',
     'guid', 'url', 'source', 'pub_date',
     'flux_batch', 'hash'
 ];

 public function getId()
 {
   return $this->id;
 }

 public function getFluxId()
 {
   return $this->flux_id;
 }

 public function getTitle()
 {
   return $this->title;
 }

 public function getDescription()
 {
   return $this->description;
 }

 public function getGuid()
 {
   return $this->guid;
 }

 public function getUrl()
 {
   return $this->url;
 }

 public function getSource()
 {
   return $this->source;
 }

 public function getPubDate()
 {
   return $this->pub_date;
 }

 public function getFluxBatch()
 {
   return $this->flux_batch;
 }

 public function Hash()
 {
   return $this->hash;
 }

}
