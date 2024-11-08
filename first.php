<?php

// $app->get('/companies/{id}', function($request)
{
    // $db = pg_connect("host=aws-0-us-east-1.pooler.supabase.com dbname=postgres user=postgres.oxevdiplqdvccgdgomkn password=ILCSJAKARTA2024")
    //                 or die('Could not connect: ' . pg_last_error());

    $host        = "host = aws-0-us-east-1.pooler.supabase.com";
    $port        = "port = 6543";
    $dbname      = "dbname = postgres";
    $credentials = "user = postgres.oxevdiplqdvccgdgomkn password=ILCSJAKARTA2024";

    // $db = pg_connect("host=aws-0-us-east-1.pooler.supabase.com port=6543 dbname=postgres user=postgres.oxevdiplqdvccgdgomkn password=ILCSJAKARTA2024" or die('Could not connect: ' . pg_last_error()));
    $db = pg_connect("$host $port $dbname $credentials");
    
    if (!$db) {
        echo "Error : Unable to open database\n";
    } else {
        // echo "Opened database successfully\n";
    }
    // $id = $request->getAttribute('id');

    $query = "select mbrg_kemasan, kd_satuan, sum(jumlah) as jumlah from training_permohonan_d group by mbrg_kemasan , kd_satuan;";


    $result = pg_query($db, $query);

    while ($row = pg_fetch_assoc($result)) {
        $data[] = $row;
    }

    if (isset($data)) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
};
