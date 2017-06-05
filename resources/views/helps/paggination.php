<nav aria-label="Page navigation">
    <ul class="pagination">
        <li>
            <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
            <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>

<nav aria-label="...">
    <ul class="pagination">
        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
        ...
    </ul>
</nav>

We recommend that you swap out active or disabled anchors for <span>,
    or omit the anchor in the case of the previous/next arrows, to remove click functionality
    while retaining intended styles.

<nav aria-label="...">
    <ul class="pagination">
        <li class="disabled">
      <span>
        <span aria-hidden="true">&laquo;</span>
      </span>
        </li>
        <li class="active">
            <span>1 <span class="sr-only">(current)</span></span>
        </li>
        ...
    </ul>
</nav>