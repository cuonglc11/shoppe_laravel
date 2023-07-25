<?php
namespace App\Components;

class Works
{
    private $data;
    private $htmlSeclect;
    public function __construct($data)
    {
      $this->data = $data;
    }
    public function categoryRecusi($parent_id, $id=0 , $text ='')
    {
        foreach ($this->data as $item ){
            if($item['parent_id'] == $id){
                if(!empty($parent_id) && $parent_id == $item['id']){
                    $this->htmlSeclect .= "<option selected value='".$item['id']."'>".$text.$item['name'].'</option>';
                }else{
                    $this->htmlSeclect .= "<option value='".$item['id']."'>".$text.$item['name'].'</option>';
                }
                $this->categoryRecusi($parent_id , $item['id'],$text .'-');
            }

        }
        return $this->htmlSeclect;
    }
}
?>
