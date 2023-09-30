<span id="{{ $userItem->mainID }}"
  class="unselectable pointer-on-hover badge ProfileTextWrap TextWrapStyle"
  style="height:28px; margin-right: 20px"><span id="{{ $userItem->innerID }}">{{ $userItem->value }}</span>{{ $userItem->optionalValue }}<div class="delete-badge-profil"
  onclick="removeItem($('#'+this.id).parent().attr('id'), '{{ $userItem->category }}')" onmouseleave="removeDeleteAnim(this.id)"
    onmouseenter="addDeleteAnim(this.id)" id="{{ $userItem->id }}">X</div></span> 
