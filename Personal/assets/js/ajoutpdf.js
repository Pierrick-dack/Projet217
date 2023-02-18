function generatepdf(){
    const element = document.getElementById("tableres");

    html2pdf()
    .from(element)
    .save();
}