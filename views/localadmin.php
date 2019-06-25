<?php 

$this->view('listings/default',
[
  "i18n_title" => 'ard.listing.title',
  "table" => [
    [
      "column" => "machine.computer_name",
      "i18n_header" => "listing.computername",
      "formatter" => "clientDetail",
    ],
    [
      "column" => "reportdata.serial_number",
      "i18n_header" => "serial",
    ],
    [
      "column" => "reportdata.long_username",
      "i18n_header" => "username",
    ],
    [
      "column" => "reportdata.console_user",
      "i18n_header" => "localadmin.currentuser",
    ],
    [
      "column" => "localadmin.users",
      "i18n_header" => "localadmin.users",
    ],
  ]
]);
