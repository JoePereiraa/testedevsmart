<?php

namespace SmartSolucoes\Model;

use PDO;
use SmartSolucoes\Core\Model;
use SmartSolucoes\Libs\Helper;

class Appointment extends Model
{
  public $table = 'appointment';

  public function allAppointments()
  {
    $sql = "
          SELECT id, title, start_date, end_date, status
          FROM $this->table 
          ORDER BY  start_date ASC;
        ";
    $query = $this->PDO()->prepare($sql);
    $query->execute();

    $events = [];

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $event = [
        'id' => $row['id'],
        'title' => $row['title'],
        'start' => $row['start_date'], // Assumindo que start_date está no formato adequado para o FullCalendar
        'end' => $row['end_date'],     // Assumindo que end_date está no formato adequado para o FullCalendar
        'status' => $row['status']
      ];

      $events[] = $event;
    }

    return $events;
  }
}
