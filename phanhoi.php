 <?php
    session_start();
    include_once('layouts/header.php');
    include_once('layouts/menu.php');
?>




 <div class="box">
        <h2 align="center">VISITOR ENQUIRY FORM</h2>
        <table align="center">
            <form>
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="fullname" id="fullname" placeholder="your name here">
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" name="email" id="email" placeholder="youremail@gmail.com">
                    </td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" id="gender" value="male"> Male
                        <input type="radio" name="gender" id="gender" value="female"> Female
                    </td>
                </tr>
                <tr>
                    <td>Location:</td>
                    <td>
                        <select name="location" id="location">
                            <option value="">--Select your location--</option>
                            <option value="Hanoi, VietNam">Hanoi, VietNam</option>
                            <option value="NewYork, USA">NewYork, USA</option>
                            <option value="Tokyo, Japan">Tokyo, Japan</option>
                            <option value="Seul, Korea">Seul, Korea</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Please write your enquiry:</td>
                    <td>
                        <textarea name="enquiry" id="enquiry" cols="40" rows="5"
                            placeholder="Type your enquiries here..."></textarea>
                    </td>
                </tr>
            </table>
            <p align="center">
            <label>
                <input type="submit" id="validate" onclick="checkForm()">
                <input type="reset" id="cencle" value="Cancle">
            </label>
            </p>
        </form>
            <script>
      function validateEmail(email) {
        let res = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return res.test(email);
      }
      function validate() {
        var fullname = document.getElementById("fullname").value;
            var email = document.getElementById("email").value;
            var location = document.getElementById("location").value;
            var enquiry = document.getElementById("enquiry").value;
        if (fullname == ""||email == ""||location == ""||enquiry == "") {
            alert("PLEASE ENTER ALL THE VALUE");
        }else if (validateEmail(email)!= true) {
            alert("Email is not valid!");
        }else{                
            let newWin = window.open("", "", "width=500,height=500");
            {
                newWin.document.write("<h3>Congratulation..!!!<\/h3>");
                newWin.document.write("<b>Your Name: </b>" + fullname + "</br>");
                newWin.document.write("<b>Your Email: </b>" + email + "</br>");
                newWin.document.write("<b>Your Location: </b>" + location + "</br>");
                newWin.document.write("<b>Product Enquiry: </b>" + enquiry + "</br>");
            }
            window.location = "web.HTML";
        }          
      }
      function returnIndex(){
        window.location = "web.HTML";
      }
      $("#validate").on("click", validate);
      $("#cancle").on("click", returnIndex);
    </script>
    </div>

    <?php
    include_once('layouts/footer.php');
?>