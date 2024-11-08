<?php

{
    $host        = "host = aws-0-us-east-1.pooler.supabase.com";
    $port        = "port = 6543";
    $dbname      = "dbname = postgres";
    $credentials = "user = postgres.oxevdiplqdvccgdgomkn password=ILCSJAKARTA2024";

    // $db = pg_connect("host=aws-0-us-east-1.pooler.supabase.com port=6543 dbname=postgres user=postgres.oxevdiplqdvccgdgomkn password=ILCSJAKARTA2024" or die('Could not connect: ' . pg_last_error()));
    $db = pg_connect("$host $port $dbname $credentials");

    $query = "select a.nm_pbm , b.mbrg_nama, sum(b.jumlah) as jumlah from training_permohonan a inner join training_permohonan_d b on a.no_pmh = b.no_pmh group by a.nm_pbm, b.mbrg_nama order by a.nm_pbm asc;";


    $result = pg_query($db, $query);

    while($row = pg_fetch_assoc($result))
    {
        $data[] = $row;
    }

    if(isset($data))
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
};

