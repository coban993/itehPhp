/* ** SORT ** */

let sortBtn = document.getElementById("sort-btn");
let tbody = document.getElementById('tbody');

let searchBox = document.getElementById('search-box');

sortBtn.addEventListener('click', (event) => {
  searchBox.value = "";

  $.ajax({
    url: 'sort.php',
    type: 'POST',
    data: {
      sortType: "title",
    },
    success: (response) => {
      let books = JSON.parse(response);
      let html = "";

      books.forEach((book) => {
        if (book.user_id == 0) {
          html += `<tr>
                    <td>${book.book_name}</td>
                    <td>${book.writer}</td>
                    <td>${book.genre}</td>
                    <td>${book.edition}</td>
                    <td>
                      <form method="POST">
                        <button type="submit" class="btn" name="pick"><i class="fas"></i>Pick</button>
                        <input type="hidden" name="book_id" value="${book.book_id}">
                      </form>
                    </td>
                  </tr>`;
        }

        tbody.innerHTML = html;
      });
    }
  });
});


searchBox.addEventListener('keyup', (event) => {
  let text = searchBox.value;

  $.ajax({
    url: 'search.php',
    type: 'POST',
    data: {
      search: text,
    },
    success: (response) => {
      let books = JSON.parse(response);
      let html = "";

      books.forEach((book) => {
        if (book.user_id == 0) {
          html += `<tr>
                    <td>${book.book_name}</td>
                    <td>${book.writer}</td>
                    <td>${book.genre}</td>
                    <td>${book.edition}</td>
                    <td>
                      <form method="POST">
                        <button type="submit" class="btn" name="pick"><i class="fas"></i>Pick</button>
                        <input type="hidden" name="book_id" value="${book.book_id}">
                      </form>
                    </td>
                  </tr>`;
        }
      });

      tbody.innerHTML = html;
    }
  });

});


