
CreateBook();

function getAllBooks()
{
   // const booksDataElement = document.getElementById('books-data');
   // booksDataElement.innerHTML = '';
    fetch('/books')
        .then(result =>result.json())
        .then((out)=>{
            displayBooks(out);
    })
        .catch(err => console.error(err));
}

function CreateBook()
{
    const title = document.getElementById('bookTitle');
    const author = document.getElementById('bookAuth');
    const description = document.getElementById('bookDescription');

    const data = {
        'title' : title.value,
        'author' : author.value,
        'description' : description.value

    }
    console.log("got data");
    fetch ('/createbook',{
        method:'POST',
        headers: {'Content-Type': 'application/json', },
        body: JSON.stringify(data),
    })
    
    .then(out =>{
        title.value = null;
        author.value=null;
        description.value = null;
       

    })

   .catch(err => console.error(err));
}

