   {{-- Modal thêm mới todo --}}

   <div class="modal fade" id="modal-add">
       <div class="modal-dialog">
           <div class="modal-content">
               <form action="" data-url="{{ route('class.store') }}" id="form-add" method="POST" role="form">
                   <div class="modal-header">
                       <h4 class="modal-title">Thêm lớp</h4>
                       <button type="button" class="close" data-dismiss="modal"
                           aria-hidden="true">&times;</button>
                   </div>
                   <div class="modal-body">
                       <div class="form-group">
                           <label for="name">Mã lớp</label>
                           <input required type="text" name="malop" class="form-control" id="malop-add"
                               placeholder="Nhập mã lớp">
                       </div>

                       <div class="form-group">
                           <label for="description">Tên lớp</label>
                           <textarea required class="form-control" name="tenlop" id="tenlop-add" cols="10"
                               rows="10"></textarea>
                       </div>
                       <div class="form-group">
                           <label for="">Tên khoa</label>
                           <?php echo $_GET; ?>>
                           <select name="tenkhoa" id="tenkhoa-add" class="form-control" required="required">
                               @foreach ($facultys[0] as $faculty){
                                   <option value="{{ $faculty->makhoa }}">{{ $faculty->tenkhoa }}</option>
                                   }
                               @endforeach
                           </select>
                       </div>
                       @csrf

                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                       <button type="submit" class="btn btn-primary">Thêm</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
