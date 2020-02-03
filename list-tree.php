<?php


function listTotal($directorio)
{
    $archivos = scandir($directorio, 1);
    /* The scandir() function returns an array of files and directories of the specified directory.

        SYNTAX
          scandir(directory, order, context)

          -directory:	Required. Specifies the directory to be scanned

          -order:	Optional. Specifies the sorting order.
              ·Default sort order is alphabetical in ascending order (0).
              ·Set to SCANDIR_SORT_DESCENDING or 1 to sort in alphabetical descending order,
              ·or SCANDIR_SORT_NONE to return the result unsorted

          -context: Optional. Specifies the context of the directory handle.
              ·Context is a set of options that can modify the behavior of a stream

      TECHNICAL DETAILS
          -RETURN VALUE:
              ·An array of files and directories on success,
              ·FALSE on failure.
              ·Throws an E_WARNING if directory is not a directory
    */




    echo "<ul>";

    foreach ($archivos as $valor) {
        /*
        -The foreach loop - Loops through a block of code for each element in an array.
        -The foreach loop works only on arrays, and is used to loop through each key/value pair in an array.
        */


        if ($valor != "." && $valor !=".." && $valor !=".git") {
            $testdir = filetype("$directorio/$valor");
            if ($testdir=="dir") {
                echo("<li>Directori: $valor </li>");
                listTotal("$directorio/$valor");
            } else {
                echo("<li>Arxiu: $valor </li>");
            }
        }
    }






    echo "</ul>";
}



listTotal("test-folder01");
