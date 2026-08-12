function highlightTableRow(row)
{
    //remove highlight from previously selected row, if any
    const previouslySelectedRow=document.querySelector('tr.selected');
    if(previouslySelectedRow)
    {
        previouslySelectedRow.classList.remove('selected');

    }
    //Highlight the clicked row
    row.classList.add('selected');
}