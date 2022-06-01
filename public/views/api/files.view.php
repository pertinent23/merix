<?php 
    if ( count( $_FILES ) ) {
        echo json_encode( [
            'count' => count( $_FILES )
        ] );
    } else {
        echo json_encode( [
            'count' => 0
        ] );
    }
?>