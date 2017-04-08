$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    closeOnSelect: true,
    closeOnClear: true,
    format: 'yyyy-mm-dd',
    onSet: function (ele) {
        if(ele.select){
            this.close();
        }

        var d1 = $('#startdate').val();
        var d2 = $('#enddate').val();

        var date1 = new Date(d1);
        var date2 = new Date(d2);

        var date1_ms = date1.getTime();
        var date2_ms = date2.getTime();

        if((date2_ms -date1_ms ) <0 )
        {
            alert('End date cannot be a previous date!');
            $('#startdate').val(d2);

        }

    }

});