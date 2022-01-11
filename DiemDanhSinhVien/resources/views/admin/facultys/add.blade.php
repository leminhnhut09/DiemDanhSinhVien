   {{-- Modal thêm mới todo --}}
   <div class="modal fade" id="modal-add">
       <div class="modal-dialog">
           <div class="modal-content">
               <form action="" data-url="{{ route('facultys.store') }}" id="form-add" method="POST" role="form">
                   @csrf
                   <div class="modal-header">
                       <h4 class="modal-title">Thêm khoa</h4>
                       <button type="button" class="close" data-dismiss="modal"
                           aria-hidden="true">&times;</button>
                   </div>
                   <div class="modal-body">

                       <div class="form-group">
                           <label for="name">Mã Khoa</label>
                           <input required type="text" name="makhoa" class="form-control" id="makhoa-add"
                               placeholder="Nhập tên danh mục">
                       </div>

                       <div class="form-group">
                           <label for="description">Tên Khoa</label>
                           <textarea required class="form-control" name="tenkhoa" id="tenkhoa-add" cols="10"
                               rows="10"></textarea>
                       </div>

                       <div class="form-group">
                           <label for="content">Ngày thành lập</label>

                           <input required type="date" class="form-control" name="ngaythanhlap" id="ngaythanhlap-add"
                               cols="30" rows="10" />
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
