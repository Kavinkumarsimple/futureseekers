<?php

namespace App\Models;

class jobDetailsModel extends \CodeIgniter\Model {
  protected $table = 'jobDetails';
  protected $primaryKey = 'id';
  protected $allowedFields = [
                              'employer_id',
                              'jobCategory',
                              'salary',
                              'closingDate',
                              'experience',
                              'typeOfEmployment',
                              'description',
                              'dateTime',
                              'status'
                            ];
}


?>