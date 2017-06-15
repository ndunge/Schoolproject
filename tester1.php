<script type="text/javascript">

 var Text = 'hello';

    function setInput(button) {
       var buttonVal = button.name,
       textbox = document.getElementById('input_' + buttonVal);
       textbox.value = Text ;
    }
</script>

<html>
      <input class='input' id="input_a1" name="a1" value="<?php {echo $a1;} ?>"> 
      <input type='submit' name='a1' value='x' onclick='setInput(this); return false;'>
</html>