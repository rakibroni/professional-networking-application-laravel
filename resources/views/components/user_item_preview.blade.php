



<span id="{{ $userItem->mainID }}"
  class="unselectable pointer-on-hover badge ProfileTextWrap TextWrapStyle" style="height:27px; margin-right: 15px; margin-bottom: 12px">
  <span id="{{ $userItem->innerID }}">{{ $userItem->value }}</span>{{ $userItem->optionalValue }}
  <div class="delete-badge-profil2" onclick="removeItem($('#'+this.id).parent().attr('id'), '{{ $userItem->category }}')" onmouseleave="removeDeleteAnim(this.id)" onmouseenter="addDeleteAnim(this.id)" id="{{ $userItem->id }}"></div>
</span> 
