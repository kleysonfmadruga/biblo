defmodule BibloWeb.CategoriesView do
  @moduledoc false

  alias Biblo.Category

  def render("create.json", %{category: %Category{name: name}}) do
    %{
      message: "Category created",
      category: %{
        name: name
      }
    }
  end
end
