$(document).ready(function() {
    var scriptTag = $("#alert").attr('src');
    var params = scriptTag.split('=')[1]
    $.ajax({
        url: 'rule/user/' + params,
        type:"get",
        success:function(data) {
            console.log(location.pathname)
           $.each(data.rules, function(elem, rule) {
              switch (rule.name) {
                  case 'pages that contains':
                      if (location.pathname.includes(rule.pivot.query_string)) {
                          alert(rule.pivot.alert_message)
                      }
                      break;
                  case 'a specific page':
                      if (location.pathname == rule.pivot.query_string) {
                          alert(rule.pivot.alert_message)
                      }
                      break;
                  case 'pages start with':
                      if (location.pathname.startsWith(rule.pivot.query_string)) {
                          alert(rule.pivot.alert_message)
                      }
                      break;
                  case 'pages ending with':
                      if (location.pathname.endsWith(rule.pivot.query_string)) {
                          alert(rule.pivot.alert_message)
                      }
                      break;
              }
           })
        }
    })

})


