$(document).ready(function () {
    console.log("Working");

    $("#register").click(function (e) { 
        e.preventDefault();
        console.log("Working");
        var name=$("#form3Example1q").val();
        var email=$("#exampleDatepicker1").val();
        var pass=$("#form3Example1w").val();
        var cpass=$("#form3Example1w1").val();
        var action=$("#register").val();
        console.log(action);
        console.log(name,email,pass,cpass);

        if(registerValidation(name,email,pass,cpass)==true){
            if(pass==cpass){
                $("#form3Example1w").css('borderColor','green');
                $("#form3Example1w1").css('borderColor','green');
                
                $.ajax({
                    type: "post",
                    url: "http://localhost:8080/Signup/lg",
                    data: {
                        action:action,
                        name:name,
                        email:email,
                        password:pass,
                        cpass:cpass
                    },
                    success: function (response) {
                        if(response==1){
                            $("#result").text("Information Saved");
                            $("#result").css('color','green');
                        }else{
                            $("#result").text("Information Not Saved");
                            $("#result").css('color','red');
                        }                     
                    }
                });
                

            }
            else{
                $("#form3Example1w").css('borderColor','red');
                $("#form3Example1w1").css('borderColor','red');
                $("#result").text("Password Not Match");
                $("#result").css('color','red');

            }
            $("#form3Example1q").css('borderColor','green');
            $("#exampleDatepicker1").css('borderColor','green');
            
        }
        else{
            $("#form3Example1q").css('borderColor','red');
            $("#exampleDatepicker1").css('borderColor','red');
            $("#form3Example1w").css('borderColor','red');
            $("#form3Example1w1").css('borderColor','red');
        }

    });

    $("#loginBTN").click(function (e) { 
        e.preventDefault();
        // console.log("working");
        var email=$("#userName").val();
        var password=$("#userPassword").val();
        // console.log(email,password);
        if(email=="" || password==""){
            $("#userName").css('borderColor','red');
            $("#userPassword").css('borderColor','red');
            $("#result").text("All Feilds are requried");

        }
        else{

            $.ajax({
                type: "post",
                url: "http://localhost:8080/Login/login",
                data: {
                    action:"login",
                    email:email,
                    password:password
                },
                success: function (response) {
                    var obj=JSON.parse(response);
                    // var em=obj[0].email;
                    // var ps=obj[0].password;
                    var count = Object.keys(obj).length;
                    console.log(count)
                    if(count>0){
                        console.log("Login Sucessfully");
                        $("#result").text("Login Sucessfully");
                        $("#userPassword").css('borderColor','green');
                        $("#userName").css('borderColor','green');
                        window.open("http://localhost:8080/blog/Mainblog", '_self');
                    }                   
                    else{
                        $("#result").text("Incorrect Username or Password");
                        $("#userPassword").css('borderColor','red');
                        $("#userName").css('borderColor','red');
                    }
                }
            });
        }

    });

    function registerValidation(name,email,pass,Cpass){
        if(name=="" || email=="" || pass=="" || Cpass==""){
            return false;
        }
        return true;
    }

    $("#btnsbt").click(function (e) { 
        e.preventDefault();
        // console.log("working");
        var cata=$( "#myselect option:selected" ).text();
        var topic=$("#btopic").val();
        var title=$("#btitle").val();
        var desc=$("#bdesc").val();
        var content=$("#bcontent").val();
        // console.log(topic,title,desc,content,cata);

        $.ajax({
            type: "post",
            url: "http://localhost:8080/Blog/writeBlog",
            data: {
                user_id:8,
                catagory:cata,
                topic:topic,
                title:title,
                desc:desc,
                content:content,
                action:"savedata"
            },
            success: function (response) {
                console.log(response);
            }
        });


    });
});