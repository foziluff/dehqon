<a href="{{ route($modul . '.show', $record->id) }}" class="btn btn-icon btn-outline-primary">
    <i class='bx bx-book-open'></i>
</a>
<a href="{{ route($modul . '.edit', $record->id) }}" class="btn btn-icon btn-outline-success">
    <i class='bx bx-pencil'></i>
</a>
<button data-bs-toggle="modal" data-bs-target="#modalCenter{{ $record->id }}" type="button" class="btn btn-icon btn-outline-danger" >
    <i class='bx bx-basket'></i>
</button>
<div class="modal fade" id="modalCenter{{ $record->id }}" tabindex="-1" aria-hidden="true">
    <form action="{{ route($modul . '.destroy', $record->id) }}" method="POST">
        @method('DELETE') @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle{{ $record->id }}">Вы уверены что, хотите удалить?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </div>
            </div>
        </div>
    </form>
</div>
