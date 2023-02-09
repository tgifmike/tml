const validationPasswordReset = new JustValidate("#passwordReset");


validationPasswordReset
.addField("#pwdReset", [
  {
    rule: "required"
  },
  {
    rule: "password"
  }
])
.addField("#pwdReset-repeat", [
  {
    validator: (value, fields) => {
      return value === fields["#pwdReset"].elem.value;
    },
    errorMessage: "Passwords Dont Match!"
  }
])
.onSuccess((event)  => {
  document.getElementById("passwordReset").submit();
});;