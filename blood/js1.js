function validateForm() {
  //get the valuse from the form and store it in(x,y,a,b,c)
  let x = document.forms["myForm"]["fname"].value;
  let y = document.forms["myForm"]["phone"].value;
  let a = document.forms["myForm"]["date_of_birth"].value;
  let b = document.forms["myForm"]["date_of_test"].value;
  let c = document.forms["myForm"]["date_of_issue"].value;


  if (x == "") {    //if full name feild is empty then display alert message and refuse to submit the form without filing it out by return false value
      alert("Name must be filled out");
      return false;
  } else if (y == "") {       //if phone number feild is empty then display alert message and refuse to submit the form without filing it out by return false value
      alert("Phone number must be filled out");
      return false;
  } else  if (isNaN(y)){     //if entered phone number feild is not number then display alert message and refuse to submit the form without filing it with numbers only by return false value
      alert("phone number Must be filled out with numbers only");
      return false;
  }  else if (a == "") {     //if date of birth feild is empty then display alert message and refuse to submit the form without filing it out by return false value
      alert("date of birth must be filled out");
      return false;
  } else if (b == "") {      //if date of test feild is empty then display alert message and refuse to submit the form without filing it out by return false value
      alert("date of test must be filled out");
      return false;
  } else if (c == "") {     //if date of issue feild is empty then display alert message and refuse to submit the form without filing it out by return false value
      alert("date of issue must be filled out");
      return false;
  }


}
