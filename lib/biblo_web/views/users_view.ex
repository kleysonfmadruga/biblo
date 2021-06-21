defmodule BibloWeb.UsersView do
  alias Biblo.User

  def render("create.json", %{user: %User{id: id, name: name}}) do
    %{
      message: "User created",
      user: %{
        id: id,
        name: name
      }
    }
  end
end
