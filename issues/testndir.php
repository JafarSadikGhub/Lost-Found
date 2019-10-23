<?php
$curdir=getcwd();
if(mkdir($curdir."/uploadssssss", 0777))
{
    echo "successfull..";
}
else
{
    echo "!Successfull..";
}
?>