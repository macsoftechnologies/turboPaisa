<div id="printableArea">
       Your Content here.....
</div>


<input type="button" onclick="printDiv('printableArea')" value="Print Invoice" />

<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>