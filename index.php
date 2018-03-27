<?
$astra_sounds_files = 'files/astra_commands.txt';
$out_file = 'files/new_commands.txt';


$fh = file ($astra_sounds_files);


$out = '';
foreach ($fh as $nx_str)
    {
    $nx_str = trim ($nx_str);


    if (preg_match ('/quantum theory.*\.mp3/', $nx_str))
        {
//        echo $nx_str,'<br />';
        $out .= create_command ($nx_str,'Tell me about');
        }
    }


// Write new commands to file
$out_fh = fopen ($out_file,'w+');
fwrite ($out_fh, $out);
fclose ($out_fh);




// Create xml command block
function create_command ($sound_file_path, $prefix_phrase)
    {
    $out = '';
    $sound_name = preg_replace ('/.*quantum theory.(.*)\.mp3/','$1',$sound_file_path);
    echo $sound_name,'<br />';
    $sound_command = $prefix_phrase.' '.$sound_name;
    $sound_file = $sound_file_path;

$out .= '
      <Command>
        <commandString>'.$sound_command.'</commandString>
        <actionList />
        <answering>false</answering>
        <answeringString />
        <answeringSound>true</answeringSound>
        <answeringSoundPath>'.$sound_file.'</answeringSoundPath>
      </Command>';
    
    return $out;
    }
?>