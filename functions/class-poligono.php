<?php

    class pointLocation {
        var $pointOnVertex = true; // Checar se o ponto se encontra exatamente em um dos vértices?
 
    function pointLocation() {
    }
 
        function pointInPolygon($point, $polygon, $pointOnVertex = true) {
        $this->pointOnVertex = $pointOnVertex;
 
        // Transformar as coordenadas em matrizes com valores "x" e "y"
        $point = $this->pointStringToCoordinates($point);
        $vertices = array(); 
        foreach ($polygon as $vertex) {
            $vertices[] = $this->pointStringToCoordinates($vertex); 
        }
 
        // Checar se o ponto se encontra exatamente em um vértice
        if ($this->pointOnVertex == true and $this->pointOnVertex($point, $vertices) == true) {
            return "Vertice";
        }
 
        //  Checar se o ponto está dentro do poligono o em uma borda
        $intersections = 0; 
        $vertices_count = count($vertices);
 
        for ($i=1; $i < $vertices_count; $i++) {
            $vertex1 = $vertices[$i-1]; 
            $vertex2 = $vertices[$i];
            if ($vertex1['y'] == $vertex2['y'] and $vertex1['y'] == $point['y'] and $point['x'] > min($vertex1['x'], $vertex2['x']) and $point['x'] < max($vertex1['x'], $vertex2['x'])) 

		{ // Checar se o ponto está em um segmento horizontal
                return "Borda";
            }
            if ($point['y'] > min($vertex1['y'], $vertex2['y']) and $point['y'] <= max($vertex1['y'], $vertex2['y']) and $point['x'] <= max($vertex1['x'], $vertex2['x']) and $vertex1['y'] != $vertex2['y']) { 
                $xinters = ($point['y'] - $vertex1['y']) * ($vertex2['x'] - $vertex1['x']) / ($vertex2['y'] - $vertex1['y']) + $vertex1['x']; 
                if ($xinters == $point['x']) 

		{ //  Checar se o ponto está em um segmento (sem ser o horizontal)
                    return "Borda";
                }
                if ($vertex1['x'] == $vertex2['x'] || $point['x'] <= $xinters) {
                    $intersections++; 
                }
            } 
        } 
        // Se o número de intercessões é impar, o ponto está dentro do polígono. 
        if ($intersections % 2 != 0) {
            return "Dentro";
        } else {
            return "Fora";
        }
    
	}
 
    function pointOnVertex($point, $vertices) {
        foreach($vertices as $vertex) {
            if ($point == $vertex) {
                return true;
            }
        }
 
    
	}
 
    function pointStringToCoordinates($pointString) {
        $coordinates = explode(" ", $pointString);
        return array("x" => $coordinates[0], "y" => $coordinates[1]);
    }

}

?>
