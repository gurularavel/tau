@props(['model', 'routeName','deleteFileName' => null])
<div class="modal fade flip" id="deleteModal-{{ $model->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-5 text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json"
                           trigger="loop"
                           colors="primary:#405189,secondary:#f06548"
                           style="width: 90px; height: 90px">
                </lord-icon>
                <div class="mt-4 text-center">
                    <h4>{{__("translate.Delete")}} "{{ $model->$deleteFileName ?? $model->title ?? $model->name}}"?</h4>
                    <p class="text-muted fs-14 mb-4">
                        {{__("translate.This action will permanently remove")}}
                    </p>
                                        <form></form>

                    <form action="{{ route('admin.'.$routeName.'.destroy', $model) }}"
                          method="POST"
                          id="deleteForm-{{ $model->id }}">
                        @csrf
                        @method('DELETE')
                        <div class="hstack gap-2 justify-content-center">
                            <button type="button"
                                    class="btn btn-link link-success fw-medium text-decoration-none"
                                    data-bs-dismiss="modal">
                                <i class="ri-close-line me-1 align-middle"></i>
                                {{__("translate.Cancel")}}
                            </button>
                            <button type="submit" class="btn btn-danger">
                                {{__("translate.Yes, Delete It")}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
