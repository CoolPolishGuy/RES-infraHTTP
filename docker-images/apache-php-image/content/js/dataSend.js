$(function() {
    console.log("loading data");

    function loadData() {
      $.getJSON("/api/students/", function (data){
        console.log(data);
        var message = "we are the five guys";
        if(data.length > 0) {

            message = data[0].finalData;
          
        }
        $(".section-heading").text(message);
      });
    };
    loadData();
    setInterval(loadData, 2000);
});
