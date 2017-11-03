       
       <!-- {!! Form::open(array('route' => array('articles.destroy', $id), 'method' => 'delete')) !!} -->
        <div class='btn-group'> 
            <button type='button' class='btn btn-warning dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              Action <span class='caret'></span>
            </button>
            <ul class='dropdown-menu'>
            <li><a href='articles/{{$id}}'>Open</a></li>
              <li>{!! link_to(route('articles.edit', $id), 'Edit') !!}</li>
              <li>{!! link_to(route('delete.destroy', $id), 'Delete') !!}</li>
              <!-- <li>{!! Form::submit('Delete', array('class' => 'btn btn-raised btn-danger', "onclick" => "return confirm('are you sure?')")) !!}</li> -->
                           
            </ul>
          </div>
          <!-- {!! Form::close() !!} -->
