<?php
    class Controls
    {
        public static function AddTextBox($label, $name, $value)
        {
            $id = md5($name);
            return '<label for="'.$id.'">'.$label.'</label>'.' '.'<input id="'.$id.'" type="textbox" name="'.$name.'" value="'.$value.'" />';
        }

        public static function AddHidden ($name, $value)
        {
            return '<input type="hidden" name="'.$name.'" value="'.$value.'">';
        }


        public static function AddSubmitButton($label, $name)
        {
            return '<input type="submit" name="'.$name.'" value="'.$label.'" />';
        }
    }