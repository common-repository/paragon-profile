<?php

class PPTools
{
    public static function naError($e)
    {
        echo'<div class="alert alert-danger" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>'.$e.'</div>';
    }

    public static function naSuccess($s)
    {
        echo'<div class="alert alert-success" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>'.$s.'</div>';
    }
    public static function naInfo($s)
    {
        echo'<div class="alert alert-info" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>'.$s.'</div>';
    }
}
