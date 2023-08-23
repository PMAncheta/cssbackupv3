function validateForm() {
    var lname = document.forms["myForm"]["lname"].value;
    var fname = document.forms["myForm"]["fname"].value;
    var mi = document.forms["myForm"]["mi"].value;
    var aname = document.forms["myForm"]["aname"].value;
    var gender = document.forms["myForm"]["gender"].value;
    var deptcode = document.forms["myForm"]["deptcode"].value;
    var igroup = document.forms["myForm"]["igroup"].value;
    var itype = document.forms["myForm"]["itype"].value;
    var rank = document.forms["myForm"]["rank"].value;
    var brofserv = document.forms["myForm"]["brofserv"].value;
    var status = document.forms["myForm"]["status"].value;
    var pix = document.forms["myForm"]["pix"].value;
    var uname = document.forms["myForm"]["uname"].value;
    var pwd = document.forms["myForm"]["pwd"].value;
    var lvl = document.forms["myForm"]["lvl"].value;
    var active = document.forms["myForm"]["active"].value;

    if (lname === "" || fname === "" || mi === "" || aname === "" || gender === "" || 
    deptcode === "" || igroup === "" || itype === "" || rank === "" || brofserv === "" || status === "" || 
    pix === "" || uname === "" || pwd === "" || lvl === "" || active === "") {
        alert("Please fill out all fields");
        return false;
    }
}
