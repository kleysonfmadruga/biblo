defmodule Biblo.Category do
  @moduledoc """
    Biblo.Category it's a module that defines a Ecto's schema for the entity Category
  """

  use Ecto.Schema

  import Ecto.Changeset
  alias Biblo.Book

  @primary_key{:id, :binary_id, autogenerate: true}
  @required_params [:name]

  schema "categories" do
    field :name, :string
    many_to_many :books, Book, join_through: "books_categories"

    timestamps()
  end

  def changeset(params) do
    %__MODULE__{}
    |> cast(params, @required_params)
    |> validate_required(@required_params)
    |> validate_length(:name, min: 1)
  end
end
