console.log("Started main.js");

$('[name="updbtn"]').css( "background-color", "green");

$('.updatebtns').click(function(ev) {
    console.log("Send POST request here from element with id" + this.value);
    $.post('index.php', {
        'delbtn':this.value}, (data) => {
        console.log("Post done");
        console.log(data);
        location.reload(); //we can just reload and let PHP handle refresh
    });
})