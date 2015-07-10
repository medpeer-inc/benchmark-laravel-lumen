<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleModel extends Model
{
  protected $connection = 'mysql';

  protected $table = 'users';

  /**
   * 全件取得する
   *
   * @param string $order
   * @param string $sort
   * @return $result
   */
  public function getAllList($order = "id", $sort = "asc")
  {
    return SampleModel::select('*')->orderBy($order, $sort)->get();
  }
}