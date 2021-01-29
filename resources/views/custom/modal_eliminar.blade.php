<!-- Modal -->
<div class="modal fade" id="modal_eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar este Registro?
        <span>{{route('programa.index')}}</span>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="{{route('programa.index')}}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-primary">Si</button>
        </form>
      </div>
    </div>
  </div>
</div>