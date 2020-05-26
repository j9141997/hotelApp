function getDate(val) {
 var date = new Date(val);
 date.setDate(date.getDate() + 1);

 var year  = date.getFullYear();
 var month = ('0' + (date.getMonth() + 1)).slice(-2);;
 var day   = ('0' + date.getDate()).slice(-2);;

 return document.getElementById('checkout_day').value = String(year) + "-" + String(month) + "-" + String(day);
}