console.log("Started main.js");

$('[name="updbtn"]').css( "background-color", "green");

$('.updatebtns').click(function(ev) {
    console.log("Send POST request here from element with id" + this.value);
})