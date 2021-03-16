$(document).ready(function() {
    var scriptTag = $("#alert").attr('src');
    var params = scriptTag.split('=')[1]
    $.ajax({
        url: 'https://poptin-task.herokuapp.com/rule/user/' + params,
        type:"get",
        success:function(data) {
            if (data.rules.length > 0) {
                $.each(data.rules, function(elem, rule) {
                    switch (rule.name) {
                        case 'pages that contains':
                            if (location.pathname.includes(rule.query_string)) {
                                alert(rule.alert_message)
                            }
                            break;
                        case 'a specific page':
                            if (location.pathname == rule.query_string) {
                                alert(rule.pivot.alert_message)
                            }
                            break;
                        case 'pages start with':
                            if (location.pathname.startsWith(rule.query_string)) {
                                alert(rule.alert_message)
                            }
                            break;
                        case 'pages ending with':
                            if (location.pathname.endsWith(rule.query_string)) {
                                alert(rule.alert_message)
                            }
                            break;
                    }
                })
            }
        }
    })

})


