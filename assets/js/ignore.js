var sql = "";
$.ajax({
  url: "index/process/GET",
  success: function(data){
    for(var i = 0; i < data.length; i ++){
      sql += "( NULL,"
      sql += "'" + data[i].soft_name + "',"
      sql += "'" + data[i].soft_description + "',";
      sql += "'" + en.crypt(data[i].soft_pid) + "',";
      sql += "'" + en.crypt(data[i].soft_key) + "',";
      sql += "'" + data[i].soft_notes + "'";
      sql += "),"
    }
  }
})