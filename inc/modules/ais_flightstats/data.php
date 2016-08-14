<?php

$dataFlight = array(
  0 => array(
    'flightId' => 625351423,
    'carrierFsCode' =>"GA",
    'flightNumber' =>"205",
    'departureAirportFsCode' =>"JOG",
    'arrivalAirportFsCode' =>"CGK",
    'departureDate' => array(
      'dateLocal' => "2015-11-08T10:05:00.000",
      'dateUtc' => "2015-11-08T03:05:00.000Z",
    ),
    'arrivalDate' => array(
      'dateLocal' => "2015-11-08T11:25:00.000",
      'dateUtc' => "2015-11-08T04:25:00.000Z",
    ),
    'status' => "S",
    'schedule' => array(
      'flightType' => "J",
      'serviceClasses' => "JY",
      'restrictions' => "",
    ),
    'operationalTimes' => array(
      'publishedDeparture' => array(
        'dateLocal' => "2015-11-08T10:05:00.000",
        'dateUtc' => "2015-11-08T03:05:00.000Z",
      ),
      'publishedArrival' => array(
        'dateLocal' => "2015-11-08T11:25:00.000",
        'dateUtc' => "2015-11-08T04:25:00.000Z",
      ),
      'scheduledGateDeparture' => array(
        'dateLocal' => "2015-11-08T10:05:00.000",
        'dateUtc' => "2015-11-08T03:05:00.000Z",
      ),
      'scheduledGateArrival' => array(
        'dateLocal' => "2015-11-08T11:25:00.000",
        'dateUtc' => "2015-11-08T04:25:00.000Z",
      ),
    ),
    'codeshares' => array(
      0 => array(
        'fsCode' => "CI",
        'flightNumber' => "9761",
        'relationship' => "L",
      ),
      1 => array(
        'fsCode' => "PG",
        'flightNumber' => "4319",
        'relationship' => "L",
      ),
    ),
    'flightDurations' => array(
      'scheduledBlockMinutes' => 80,
    ),
    'airportResources' => array(
      'arrivalTerminal' => "2",
    ),
    'flightEquipment' => array(
      'scheduledEquipmentIataCode' => "738",
    ),
  )
);

return $dataFlight;

  /*}
  [1]=>
  array(13) {
    ["flightId"]=>
    int(625351426)
    ["carrierFsCode"]=>
    string(2) "SJ"
    ["flightNumber"]=>
    string(3) "231"
    ["departureAirportFsCode"]=>
    string(3) "JOG"
    ["arrivalAirportFsCode"]=>
    string(3) "CGK"
    ["departureDate"]=>
    array(2) {
      ["dateLocal"]=>
      string(23) "2015-11-08T10:30:00.000"
      ["dateUtc"]=>
      string(24) "2015-11-08T03:30:00.000Z"
    }
    ["arrivalDate"]=>
    array(2) {
      ["dateLocal"]=>
      string(23) "2015-11-08T11:40:00.000"
      ["dateUtc"]=>
      string(24) "2015-11-08T04:40:00.000Z"
    }
    ["status"]=>
    string(1) "S"
    ["schedule"]=>
    array(4) {
      ["flightType"]=>
      string(1) "J"
      ["serviceClasses"]=>
      string(1) "Y"
      ["restrictions"]=>
      string(0) ""
      ["uplines"]=>
      array(1) {
        [0]=>
        array(2) {
          ["fsCode"]=>
          string(3) "BPN"
          ["flightId"]=>
          int(625320145)
        }
      }
    }
    ["operationalTimes"]=>
    array(4) {
      ["publishedDeparture"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T10:30:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T03:30:00.000Z"
      }
      ["publishedArrival"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T11:40:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T04:40:00.000Z"
      }
      ["scheduledGateDeparture"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T10:30:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T03:30:00.000Z"
      }
      ["scheduledGateArrival"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T11:40:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T04:40:00.000Z"
      }
    }
    ["flightDurations"]=>
    array(1) {
      ["scheduledBlockMinutes"]=>
      int(70)
    }
    ["airportResources"]=>
    array(1) {
      ["arrivalTerminal"]=>
      string(1) "1"
    }
    ["flightEquipment"]=>
    array(1) {
      ["scheduledEquipmentIataCode"]=>
      string(3) "733"
    }
  }
  [2]=>
  array(12) {
    ["flightId"]=>
    int(625351452)
    ["carrierFsCode"]=>
    string(3) "CTV"
    ["flightNumber"]=>
    string(4) "9173"
    ["departureAirportFsCode"]=>
    string(3) "JOG"
    ["arrivalAirportFsCode"]=>
    string(3) "PKU"
    ["departureDate"]=>
    array(2) {
      ["dateLocal"]=>
      string(23) "2015-11-08T10:30:00.000"
      ["dateUtc"]=>
      string(24) "2015-11-08T03:30:00.000Z"
    }
    ["arrivalDate"]=>
    array(2) {
      ["dateLocal"]=>
      string(23) "2015-11-08T12:35:00.000"
      ["dateUtc"]=>
      string(24) "2015-11-08T05:35:00.000Z"
    }
    ["status"]=>
    string(1) "S"
    ["schedule"]=>
    array(3) {
      ["flightType"]=>
      string(1) "J"
      ["serviceClasses"]=>
      string(1) "Y"
      ["restrictions"]=>
      string(0) ""
    }
    ["operationalTimes"]=>
    array(4) {
      ["publishedDeparture"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T10:30:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T03:30:00.000Z"
      }
      ["publishedArrival"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T12:35:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T05:35:00.000Z"
      }
      ["scheduledGateDeparture"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T10:30:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T03:30:00.000Z"
      }
      ["scheduledGateArrival"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T12:35:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T05:35:00.000Z"
      }
    }
    ["flightDurations"]=>
    array(1) {
      ["scheduledBlockMinutes"]=>
      int(125)
    }
    ["flightEquipment"]=>
    array(1) {
      ["scheduledEquipmentIataCode"]=>
      string(3) "320"
    }
  }
  [3]=>
  array(13) {
    ["flightId"]=>
    int(625351453)
    ["carrierFsCode"]=>
    string(3) "IN*"
    ["flightNumber"]=>
    string(4) "9080"
    ["departureAirportFsCode"]=>
    string(3) "JOG"
    ["arrivalAirportFsCode"]=>
    string(3) "PLM"
    ["departureDate"]=>
    array(2) {
      ["dateLocal"]=>
      string(23) "2015-11-08T10:25:00.000"
      ["dateUtc"]=>
      string(24) "2015-11-08T03:25:00.000Z"
    }
    ["arrivalDate"]=>
    array(2) {
      ["dateLocal"]=>
      string(23) "2015-11-08T11:45:00.000"
      ["dateUtc"]=>
      string(24) "2015-11-08T04:45:00.000Z"
    }
    ["status"]=>
    string(1) "S"
    ["schedule"]=>
    array(3) {
      ["flightType"]=>
      string(1) "J"
      ["serviceClasses"]=>
      string(2) "JY"
      ["restrictions"]=>
      string(0) ""
    }
    ["operationalTimes"]=>
    array(4) {
      ["publishedDeparture"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T10:25:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T03:25:00.000Z"
      }
      ["publishedArrival"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T11:45:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T04:45:00.000Z"
      }
      ["scheduledGateDeparture"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T10:25:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T03:25:00.000Z"
      }
      ["scheduledGateArrival"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T11:45:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T04:45:00.000Z"
      }
    }
    ["codeshares"]=>
    array(1) {
      [0]=>
      array(3) {
        ["fsCode"]=>
        string(2) "SJ"
        ["flightNumber"]=>
        string(4) "9080"
        ["relationship"]=>
        string(1) "S"
      }
    }
    ["flightDurations"]=>
    array(1) {
      ["scheduledBlockMinutes"]=>
      int(80)
    }
    ["flightEquipment"]=>
    array(1) {
      ["scheduledEquipmentIataCode"]=>
      string(3) "735"
    }
  }
  [4]=>
  array(12) {
    ["flightId"]=>
    int(625351466)
    ["carrierFsCode"]=>
    string(3) "JT*"
    ["flightNumber"]=>
    string(3) "644"
    ["departureAirportFsCode"]=>
    string(3) "JOG"
    ["arrivalAirportFsCode"]=>
    string(3) "UPG"
    ["departureDate"]=>
    array(2) {
      ["dateLocal"]=>
      string(23) "2015-11-08T10:25:00.000"
      ["dateUtc"]=>
      string(24) "2015-11-08T03:25:00.000Z"
    }
    ["arrivalDate"]=>
    array(2) {
      ["dateLocal"]=>
      string(23) "2015-11-08T13:25:00.000"
      ["dateUtc"]=>
      string(24) "2015-11-08T05:25:00.000Z"
    }
    ["status"]=>
    string(1) "S"
    ["schedule"]=>
    array(3) {
      ["flightType"]=>
      string(1) "J"
      ["serviceClasses"]=>
      string(2) "FY"
      ["restrictions"]=>
      string(0) ""
    }
    ["operationalTimes"]=>
    array(4) {
      ["publishedDeparture"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T10:25:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T03:25:00.000Z"
      }
      ["publishedArrival"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T13:25:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T05:25:00.000Z"
      }
      ["scheduledGateDeparture"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T10:25:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T03:25:00.000Z"
      }
      ["scheduledGateArrival"]=>
      array(2) {
        ["dateLocal"]=>
        string(23) "2015-11-08T13:25:00.000"
        ["dateUtc"]=>
        string(24) "2015-11-08T05:25:00.000Z"
      }
    }
    ["flightDurations"]=>
    array(1) {
      ["scheduledBlockMinutes"]=>
      int(120)
    }
    ["flightEquipment"]=>
    array(1) {
      ["scheduledEquipmentIataCode"]=>
      string(3) "738"
    }
  }
} );*/