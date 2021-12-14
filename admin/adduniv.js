<scripr type ="text/javascript">
    $(document).ready(function(){
        $('#insertbtn').click(function(e){
            e.preventDefault();
            $.ajax({
                method: "post",
                url : "ajax/adduni.php",
                data: $(#adding).serialize(),
                datatype: "text",
                success:function(response){
                    alert("Data inserted successfully");
                }
            })
        })
    });
</scripr>